function isGeometricProgression(arr) {
  for (let i = 0; i < arr.length; i++) {
    let numStr = arr[i].toString();
    let isGeoProg = true;
    for (let j = 0; j < numStr.length - 2; j++) {
      if (parseInt(numStr[j + 1]) / parseInt(numStr[j]) !== parseInt(numStr[j + 2]) / parseInt(numStr[j + 1])) {
        isGeoProg = false;
        break;
      }
    }
    if (isGeoProg) {
      console.log(${arr[i]} forms a geometric progression.);
    }
  }
}

let numbers = [123, 256, 345, 1024, 729];
isGeometricProgression(numbers);