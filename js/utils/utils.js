// Fungsi untuk menghasilkan kunci dengan MWCG
function generateMWCGKey(text) {
  const seed = Date.now();
  const initial = seed % 5;
  let key = "";
  let carry = seed; // Use the seed to generate an initial carry
  let multiplier = seed % 10; // This can be any number, but it's often a prime number
  let modulus = 10; // This will generate numbers between 0-9

  for (let i = 0; i < text.length; i++) {
    let nextCarry = (initial * carry + multiplier) % modulus;
    carry = nextCarry;
    let nextNumber = Math.floor((initial * carry + multiplier) / modulus);
    multiplier = nextNumber;
    key += nextNumber.toString();
  }

  return key;
}

// Fungsi untuk mengenkripsi pesan dengan algoritma Gronsfeld
function gronsfeldEncrypt(text, key) {
  const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  let encryptedText = "";
  for (let i = 0; i < text.length; i++) {
    const char = text[i];
    const shift = parseInt(key[i % key.length]);
    const index =
      (alphabet.indexOf(char.toUpperCase()) + shift) % alphabet.length;
    encryptedText += alphabet[index];
  }
  return encryptedText;
}

// Fungsi untuk mendekripsi pesan dengan algoritma Gronsfeld
function gronsfeldDecrypt(encryptedText, key) {
  const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  let decryptedText = "";
  for (let i = 0; i < encryptedText.length; i++) {
    const char = encryptedText[i];
    const shift = parseInt(key[i % key.length]);
    const index =
      (alphabet.indexOf(char.toUpperCase()) - shift + alphabet.length) %
      alphabet.length;
    decryptedText += alphabet[index];
  }
  return decryptedText;
}

//   // Contoh penggunaan:
//   const secretMessage = 'PESANRAHASIA';
//   const keyLength = secretMessage.length;
//   const randomKey = generateMWCGKey(keyLength); // Menghasilkan kunci dengan MWCG
//   const encryptedMessage = gronsfeldEncrypt(secretMessage, randomKey);
//   const decryptedMessage = gronsfeldDecrypt(encryptedMessage, randomKey);

//   console.log('Pesan Rahasia:', secretMessage);
//   console.log('Kunci Acak MWCG:', randomKey);
//   console.log('Pesan Terenkripsi:', encryptedMessage);
//   console.log('Pesan Terdekripsi:', decryptedMessage);

//   console.log('Budi Darma:', gronsfeldEncrypt("BUDIDARMA", "123451234"))
