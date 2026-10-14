<?php
/**
 * Procesamiento seguro del formulario de contacto.
 *
 * Protege la sesión, valida el token CSRF, descarta el campo trampa, limita
 * envíos consecutivos y aplica Post/Redirect/Get cuando el correo se acepta.
 */

session_start([
    'cookie_httponly' => true,
    'cookie_samesite' => 'Lax',
    'cookie_secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
]);

header('Cache-Control: no-store');
$_SESSION['contact_token'] = $_SESSION['contact_token'] ?? bin2hex(random_bytes(32));

$campos = [
    'nombres' => '',
    'apellidos' => '',
    'correo' => '',
    'telefono' => '',
    'empresa' => '',
    'asunto' => '',
    'mensaje' => '',
    'privacidad' => ''
];

$campos['asunto'] = isset($_GET['asunto']) && is_string($_GET['asunto']) ? trim($_GET['asunto']) : '';
$errores = [];
$aviso = '';
$enviado = !empty($_SESSION['contact_sent']);
unset($_SESSION['contact_sent']);

function escaparContacto($valor) {
    return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($campos as $clave => $valor) {
        $campos[$clave] = isset($_POST[$clave]) && is_string($_POST[$clave]) ? trim($_POST[$clave]) : '';
    }
    $campos['privacidad'] = !empty($_POST['privacidad']) ? '1' : '';

    $token = $_POST['token'] ?? '';

    if (!is_string($token) || !hash_equals($_SESSION['contact_token'], $token)) {
        $aviso = 'La sesión del formulario caducó. Revisa tus datos y vuelve a enviarlo.';
    } elseif (!empty($_POST['website'])) {
        $aviso = 'No pudimos procesar la solicitud. Inténtalo de nuevo.';
    } elseif (time() - ($_SESSION['contact_last_sent'] ?? 0) < 60) {
        $aviso = 'Espera un minuto antes de enviar otra consulta.';
    } else {
        if (mb_strlen($campos['nombres']) < 2 || mb_strlen($campos['nombres']) > 100) $errores['nombres'] = 'Escribe tus nombres, entre 2 y 100 caracteres.';
        if (mb_strlen($campos['apellidos']) < 2 || mb_strlen($campos['apellidos']) > 100) $errores['apellidos'] = 'Escribe tus apellidos, entre 2 y 100 caracteres.';
        if (strlen($campos['correo']) > 254 || !filter_var($campos['correo'], FILTER_VALIDATE_EMAIL) || preg_match('/[\r\n]/', $campos['correo'])) $errores['correo'] = 'Escribe un correo electrónico válido.';
        if ($campos['telefono'] !== '' && !preg_match('/^[+0-9() .-]{7,30}$/', $campos['telefono'])) $errores['telefono'] = 'Escribe un teléfono válido, de 7 a 30 caracteres.';
        if (mb_strlen($campos['empresa']) > 150) $errores['empresa'] = 'Usa un máximo de 150 caracteres.';
        if (mb_strlen($campos['asunto']) < 3 || mb_strlen($campos['asunto']) > 160 || preg_match('/[\r\n]/', $campos['asunto'])) $errores['asunto'] = 'Escribe un asunto de entre 3 y 160 caracteres.';
        if (mb_strlen($campos['mensaje']) < 10 || mb_strlen($campos['mensaje']) > 5000) $errores['mensaje'] = 'Escribe un mensaje de entre 10 y 5000 caracteres.';
        if (empty($campos['privacidad'])) $errores['privacidad'] = 'Debes aceptar los términos y las políticas de privacidad.';

        if (!$errores) {
            $destinatario = getenv('GAMBACUA_CONTACT_TO');
            $remitente = getenv('GAMBACUA_MAIL_FROM');
            $configuracionValida = $destinatario
                && $remitente
                && filter_var($destinatario, FILTER_VALIDATE_EMAIL)
                && filter_var($remitente, FILTER_VALIDATE_EMAIL)
                && !preg_match('/[\r\n]/', $destinatario.$remitente);

            if (!$configuracionValida) {
                $aviso = 'El envío por formulario todavía no está disponible. Tu mensaje no se ha enviado. Puedes llamarnos al +52 662 110 1511.';
            } else {
                $cuerpo = "Nombres: {$campos['nombres']}\nApellidos: {$campos['apellidos']}\nCorreo: {$campos['correo']}\nTeléfono: {$campos['telefono']}\nEmpresa: {$campos['empresa']}\nAsunto: {$campos['asunto']}\n\n{$campos['mensaje']}";
                $aceptado = @mail($destinatario, 'Gambacua: '.$campos['asunto'], $cuerpo, [
                    'From' => $remitente,
                    'Reply-To' => $campos['correo'],
                    'MIME-Version' => '1.0',
                    'Content-Type' => 'text/plain; charset=UTF-8'
                ]);

                if ($aceptado) {
                    $_SESSION['contact_last_sent'] = time();
                    $_SESSION['contact_sent'] = true;
                    $_SESSION['contact_token'] = bin2hex(random_bytes(32));
                    header('Location: contacto.php#formulario', true, 303);
                    exit;
                }

                $aviso = 'No pudimos enviar tu mensaje. Tus datos siguen en el formulario para que puedas intentarlo de nuevo. También puedes llamarnos al +52 662 110 1511.';
            }
        }
    }
}
