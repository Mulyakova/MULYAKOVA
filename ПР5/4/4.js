function removeExtraSpaces(str) {
    
    return str.replace(/\s+/g, ' ');
}
var word = prompt("������� �����:");

word = word.trim();

var word = removeExtraSpaces(word);
console.log(word); 