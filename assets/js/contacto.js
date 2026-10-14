/** Validación accesible del formulario antes del envío al servidor. */
document.addEventListener('DOMContentLoaded', () => {
  const formulario = document.querySelector('form.contact-form');
  if (!formulario) return;

  formulario.addEventListener('submit', evento => {
    const obligatorios = formulario.querySelectorAll('input[required], textarea[required]');
    let tieneError = false;

    obligatorios.forEach(campo => {
      const vacio = !campo.value.trim();
      if (vacio) campo.setAttribute('aria-invalid', 'true');
      else campo.removeAttribute('aria-invalid');
      if (vacio) tieneError = true;
    });

    if (tieneError) {
      evento.preventDefault();
      formulario.querySelector('[aria-invalid="true"]')?.focus();
    }
  });

  formulario.querySelectorAll('input, textarea').forEach(campo => {
    campo.addEventListener('input', () => {
      if (campo.value.trim()) campo.removeAttribute('aria-invalid');
    });
  });
});
