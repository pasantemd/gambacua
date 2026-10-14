/** Validación accesible del formulario antes del envío al servidor. */
document.addEventListener('DOMContentLoaded', () => {
  const formulario = document.querySelector('form.contact-form');
  if (!formulario) return;

  formulario.addEventListener('submit', evento => {
    const obligatorios = formulario.querySelectorAll('input[required], textarea[required]');
    let tieneError = false;

    obligatorios.forEach(campo => {
      const invalido = campo.type === 'checkbox' ? !campo.checked : !campo.value.trim();
      if (invalido) campo.setAttribute('aria-invalid', 'true');
      else campo.removeAttribute('aria-invalid');
      if (invalido) tieneError = true;
    });

    if (tieneError) {
      evento.preventDefault();
      formulario.querySelector('[aria-invalid="true"]')?.focus();
    }
  });

  formulario.querySelectorAll('input, textarea').forEach(campo => {
    const limpiar = () => {
      const valido = campo.type === 'checkbox' ? campo.checked : Boolean(campo.value.trim());
      if (valido) campo.removeAttribute('aria-invalid');
    };
    campo.addEventListener('input', limpiar);
    campo.addEventListener('change', limpiar);
  });
});
