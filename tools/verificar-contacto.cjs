const {chromium}=require('C:/xampp/htdocs/compact-dry/node_modules/playwright');
(async()=>{
 const browser=await chromium.launch({headless:true});
 const page=await browser.newPage();
 for(const width of [1440,390,320]){
  await page.setViewportSize({width,height:1000});
  await page.goto('http://localhost/gambacua/contacto.php',{waitUntil:'domcontentloaded'});
  await page.evaluate(()=>document.fonts.ready);
  if(await page.evaluate(()=>document.documentElement.scrollWidth>innerWidth))throw Error('Overflow '+width);
  if(width!==320)await page.screenshot({path:`tools/screenshots/contact-${width}.png`,fullPage:true});
 }
 await page.locator('#nombres').fill('Prueba');
 await page.locator('#apellidos').fill('Técnica');
 await page.locator('#correo').fill('test@example.com');
 await page.locator('#mensaje').fill('Consulta de prueba sin envío externo.');
 // Bypass browser validation to exercise the PHP validation independently.
 await page.locator('#correo').fill('invalido');
 await Promise.all([page.waitForNavigation({waitUntil: 'domcontentloaded'}), page.locator('form').evaluate(form=>form.submit())]);
 await page.waitForLoadState('domcontentloaded');
 await page.locator('#error-correo').waitFor();
 if(await page.locator('#nombres').inputValue()!=='Prueba' || await page.locator('#apellidos').inputValue()!=='Técnica')throw Error('Lost form data');
 await page.locator('input[name=token]').evaluate(input=>input.value='invalid-token');
 await Promise.all([page.waitForNavigation({waitUntil: 'domcontentloaded'}), page.locator('form').evaluate(form=>form.submit())]);
 await page.waitForLoadState('domcontentloaded');
 if(!await page.getByRole('alert').textContent().then(text=>text.includes('caducó')))throw Error('CSRF not rejected');
 console.log('PASS: responsive 1440/390/320, server validation, preserved values, CSRF. No email sent.');
 await browser.close();
})().catch(e=>{console.error(e);process.exit(1)});
