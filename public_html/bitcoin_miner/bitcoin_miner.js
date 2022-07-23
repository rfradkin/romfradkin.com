// I started to create a browser bitcoin miner, but it turns out that's more complicated than I 
// initially thought. I'll come back to this at some point, but the browser miner is not in use 
// right now

// https://remarkablemark.medium.com/how-to-generate-a-sha-256-hash-with-javascript-d3b2696382fd
function sha_256(string) {
    const utf8 = new TextEncoder().encode(string);
    return crypto.subtle.digest('SHA-256', utf8).then((hashBuffer) => {
      const hashArray = Array.from(new Uint8Array(hashBuffer));
      const hashHex = hashArray
        .map((bytes) => bytes.toString(16).padStart(2, '0'))
        .join('');
      return hashHex;
    });
  }

function random_string(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * 
 charactersLength));
   }
   return result;
}

  
for (let i = 0; i < 1000; i++) { 
    sha_256(random_string(6000)).then((hex) => console.log(hex)); // '2c26b46b68ffc68ff99b453c1d30413413422d706483bfa0f98a5e886266e7ae'
}