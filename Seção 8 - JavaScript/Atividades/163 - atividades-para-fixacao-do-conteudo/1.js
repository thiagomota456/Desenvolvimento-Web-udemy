var readline = require('readline');
var resp = "";

var leitor = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

leitor.question('Dígite a sua idade: ', function(answer) {
    var resp = answer;

if(resp<0)
    console.log('Espirito maligno');

if(resp>=0 && resp<15)
    console.log('Criança');

if(resp>=15 && resp<30)
    console.log('Jovem');

if(resp>=30 && resp<60)
    console.log('Adulto');

if(resp>=60)
    console.log('Idoso');
    
    leitor.close();
});

