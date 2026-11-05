const fs = require('node:fs');
const path = require('node:path');

const root = path.resolve(__dirname, '..');
const extensions = new Set(['.php', '.css', '.js', '.cjs', '.md']);
const ignored = new Set(['.git', 'assets/images', 'assets/vendor', 'node_modules', 'tools/screenshots']);

function collect(directory, relative = '') {
  const files = [];
  for (const entry of fs.readdirSync(directory, { withFileTypes: true })) {
    const childRelative = path.join(relative, entry.name);
    const normalized = childRelative.replaceAll('\\', '/');
    if ([...ignored].some(item => normalized === item || normalized.startsWith(`${item}/`))) continue;
    const child = path.join(directory, entry.name);
    if (entry.isDirectory()) files.push(...collect(child, childRelative));
    else if (extensions.has(path.extname(entry.name))) files.push(child);
  }
  return files;
}

const missing = [];
const references = new Set();
for (const file of collect(root)) {
  if (file === __filename) continue;
  const content = fs.readFileSync(file, 'utf8');
  const candidates = [
    ...content.matchAll(/assets\/images\/[^'"`\s)]+/g),
    ...content.matchAll(/\.\.\/images\/[^'"`\s)]+/g),
  ].map(match => match[0].replace(/[.,;:]$/, ''));

  for (const candidate of candidates) {
    if (candidate.includes('*') || candidate.includes('<') || candidate.includes('${')) continue;
    const cleanCandidate = candidate.split(/[?#]/, 1)[0];
    const absolute = cleanCandidate.startsWith('../images/')
      ? path.resolve(path.dirname(file), cleanCandidate)
      : path.resolve(root, cleanCandidate);
    references.add(path.normalize(absolute));
    if (!fs.existsSync(absolute)) missing.push(`${path.relative(root, file)} -> ${candidate}`);
  }

  for (const match of content.matchAll(/espacioMultimedia\('([^']+)'/g)) {
    const absolute = path.resolve(root, 'assets/images', match[1]);
    references.add(path.normalize(absolute));
    if (!fs.existsSync(absolute)) missing.push(`${path.relative(root, file)} -> assets/images/${match[1]}`);
  }
}

console.log(JSON.stringify({ references: references.size, missing }, null, 2));
process.exitCode = missing.length ? 1 : 0;
