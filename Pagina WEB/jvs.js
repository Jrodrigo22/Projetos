function imc(valor){
var kg = document.getElementById("kg").value;
var al = document.getElementById("altura").value;
var vIMC = kg / (al * al);
var estado;

if(vIMC < 18.5){
    estado = "abaixo do";
} else if(vIMC <25){
    estado = "valor";
} else if(vIMC <30){
    estado = "acima do";
} else if(vIMC <35){
    estado = "muito acima do";
};

document.getElementById("imcdisplay").innerHTML = "Você está com o IMC "+vIMC+", "+estado+" indicado.";
}
function calcularSELIC() {
    const valorInicial = parseFloat(document.getElementById('valorInicial').value);
    const taxaSelic = parseFloat(document.getElementById('taxaSelic').value) / 100; 
    const periodo = parseInt(document.getElementById('periodo').value);

    const valorFuturo = valorInicial * Math.pow((1 + taxaSelic / 12), periodo);

    document.getElementById('selicdisplay').textContent = `Valor final: R$ ${valorFuturo.toFixed(2)}`;
}
function financiamentoV() {
    const valorBem = parseFloat(document.getElementById('valor-bem').value);
    const prazo = parseInt(document.getElementById('prazo').value);
    const taxaJurosAnual = parseFloat(document.getElementById('taxa-juros').value);
  
    const taxaJurosMensal = taxaJurosAnual / 12 / 100;
  
    const prestacao = (valorBem * taxaJurosMensal) / (1 - Math.pow(1 + taxaJurosMensal, -prazo));
  
    const resultadoDiv = document.getElementById('resultado');
    resultadoDiv.textContent = `O valor da prestação é: R$ ${prestacao.toFixed(2)}`;
  }

  function gerarDezenas() {
    const dezenas = [];
  
    while (dezenas.length < 6) {
      const numeroAleatorio = Math.floor(Math.random() * 60) + 1;
      if (!dezenas.includes(numeroAleatorio)) {
        dezenas.push(numeroAleatorio);
      }
    }
  
    dezenas.sort((a, b) => a - b);
  
    const resultadoDiv = document.getElementById('geradordisplay');
    resultadoDiv.textContent = `Suas dezenas da sorte: ${dezenas.join(', ')}`;
  }

  function calcSAC() {
    const valorImovel = parseFloat(document.getElementById('valor-imovel').value);
    const entrada = parseFloat(document.getElementById('entrada').value);
    const prazo = parseInt(document.getElementById('prazo').value);
    const taxaJurosAnual = parseFloat(document.getElementById('taxa-juros').value);
  
    const valorFinanciado = valorImovel - entrada;
  
    const taxaJurosMensal = taxaJurosAnual / 12 / 100;
  
    const amortizacaoMensal = valorFinanciado / prazo;
  
    let saldoDevedor = valorFinanciado;
    let resultado = "";
  
    for (let mes = 1; mes <= prazo; mes++) {
      const juros = saldoDevedor * taxaJurosMensal;
      const prestacao = amortizacaoMensal + juros;
      saldoDevedor -= amortizacaoMensal;
  
      resultado += `Mês ${mes}: Prestação: R$ ${prestacao.toFixed(2)}, Juros: R$ ${juros.toFixed(2)}, Saldo Devedor: R$ ${saldoDevedor.toFixed(2)}<br>`;
    }
  
    const resultadoDiv = document.getElementById('sacdisplay');
    resultadoDiv.innerHTML = resultado;
  }

  const pessoas = []; 

  function adicionarPessoa() {
    const nome = document.getElementById('nome').value;
    const altura = parseFloat(document.getElementById('altura').value);
    const peso = parseFloat(document.getElementById('peso').value);
  
    const novaPessoa = { nome, altura, peso };
    pessoas.push(novaPessoa);
  
    const tabela = document.getElementById('tbody-pessoas');
    const novaLinha = tabela.insertRow();
    const celulaNome = novaLinha.insertCell();
    const celulaAltura = novaLinha.insertCell();
    const celulaPeso = novaLinha.insertCell();
    celulaNome.textContent = nome;
    celulaAltura.textContent = altura;
    celulaPeso.textContent = peso;
  
    document.getElementById('nome').value = '';
    document.getElementById('altura').value = '';
    document.getElementById('peso').value = '';
  
    calcularMedias();
  }
  
  function calcularMedias() {
    const alturas = pessoas.map(pessoa => pessoa.altura);
    const pesos = pessoas.map(pessoa => pessoa.peso);
  
    const mediaAltura = alturas.reduce((total, altura) => total + altura, 0) / alturas.length;
    const mediaPeso = pesos.reduce((total, peso) => total + peso, 0) / pesos.length;
  
    document.getElementById('media-altura').textContent = mediaAltura.toFixed(2);
    document.getElementById('media-peso').textContent = mediaPeso.toFixed(2);
  }

  const vn =[];
  const vs =[];
  const vcvt =[];
  const vinss =[];
  const virpf =[];
  const vvale =[];
  const vsl =[];
  var tabela ="";
  function novo(){
      vn.push(document.getElementById("n").value);
      vs.push(document.getElementById("s").value);
      vcvt.push(document.getElementById("cvt").value);  
      exibir();  
      document.getElementById("n").value="";
      document.getElementById("s").value="";
      document.getElementById("cvt").value="";
      document.getElementById("n").focus();
  }
  
  function excluir(indice){
      vn.splice(indice,1);
      vs.splice(indice,1);
      vcvt.splice(indice,1);    
      exibir();
  }
  
  function exibir(){
      tabela = "<table border=1><tr><th>NOME</th><th>SALÁRIO</th>"+
      "<th>INSS</th><th>IRPF</th><th>VT</th><th>SALÁRIO LIQUIDO</th>"+
      "<th>Ação</th></tr>";
      for(let i=0;i<vn.length;i++){
          var inss;
      if (vs[i]<=1412){
        inss = vs[i]*0.075;
      }else if (vs[i]<=2666.68){
          inss = vs[i]*0.09;
      }else if (vs[i]<=4000.03){
          inss = vs[i]*0.12;
      }else if (vs[i]<=7786.02){
          inss = vs[i]*0.14;
      }else{
          inss = 7786.02*0.14;
      }
      vinss.push(inss);
      var irpf;
      if (vs[i]<=2259.20){
          irpf = 0;
      }else if (vs[i]<=2826.65){
          irpf = vs[i]*0.075;
      }else if (vs[i]<=3751.05){
          irpf = vs[i]*0.15;
      }else if (vs[i]<=4664.68){
          irpf = vs[i]*0.225;
      }else{
          irpf = vs[i]*0.275;
      }
      virpf.push(irpf);
      var vale = vs[i]*0.06;
      if(vcvt[i]<=vale){
          vale = vcvt[i];
      } 
      vvale.push(vale);
      var sl;
      sl = vs[i] - inss - irpf - vale;
      vsl.push(sl);
          tabela = tabela + "<tr><td>"+vn[i]+"</td><td>"+vs[i]+"</td><td id='vinss'>"+inss+"</td><td id='virpf'>"+irpf+"</td><td id='vvale'>"+vale+"</td><td id='vsl'>"+sl+"</td><td><button class='b' onclick='excluir(this.value)' value="+i+">"        
          +"EXCLUIR</button></td></tr>";
      }
      
      tabela = tabela+totais()+"</table>";
      document.getElementById("lista").innerHTML= tabela;
  }
  
  
      
  
  function totais(){
      var ts = 0;
      var tinss = 0;
      var tirpf = 0;
      var tvale = 0;
      var tsl = 0;
      for(let i=0;i<vn.length;i++){
         var ts = ts + parseFloat(vs[i]); 
         var tinss = tinss + parseFloat(vinss[i]);
         var tirpf = tirpf + parseFloat(virpf[i]); 
         var tvale = tvale + parseFloat(vvale[i]);  
         var tsl = tsl + parseFloat(vsl[i]); 
             }
      return "<tr><td>TOTAIS</td><td>"+ts+"</td><td>"+tinss+"</td>"+
      "<td>"+tirpf+"</td><td>"+tvale+"</td><td>"+tsl+"</td></tr>";
  }

  function calcularTempo() {
    const valorMensal = parseFloat(document.getElementById('valorMensal').value);
    const taxaRendimento = parseFloat(document.getElementById('taxaRendimento').value) / 100;
    const valorAlvo = 1000000;
  
    let saldo = 0;
    let meses = 0;
  
    while (saldo < valorAlvo) {
      saldo += valorMensal + (saldo * taxaRendimento);
      meses++;
    }
  
    const anos = meses / 12;
  
    document.getElementById('resultado').textContent = `Você levará aproximadamente ${anos.toFixed(2)} anos para juntar R$ 1 milhão.`;
  }