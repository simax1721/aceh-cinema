function ucwords(str) {
  return str.replace(/\b\w/g, (char) => char.toUpperCase());
}