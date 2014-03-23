function insereCampoAposta(modalidade, apostas, botaoAposta) {
    switch(modalidade){
        case 'secaDezena': {
            apostas.innerHTML = "<td>Defina o valor da Dezena: </td><td><input type='text' name='dezena'/></td>";
            botaoAposta.innerHTML = "<td></td><td><input type='submit' value='Apostar'/>";
            break;
        }
        
        case 'duqueDezena': {
            apostas.innerHTML = "<tr><td>Defina o valor da 1º Dezena: <input type='text' name='dezena1'/></br>"+
                                    "    Defina o valor da 2º Dezena: <input type='text' name='dezena2'/></td></tr>";
            botaoAposta.innerHTML = "<td></td><td><input type='submit' value='Apostar'/>";
            break;
        }
        
        case 'ternoDezena': {
            apostas.innerHTML = "<tr><td>Defina o valor da 1º Dezena: <input type='text' name='dezena1'/></br>"+
                                "        Defina o valor da 2º Dezena: <input type='text' name='dezena2'/></br>"+
                                "        Defina o valor da 3º Dezena: <input type='text' name='dezena3'/></td></tr>";
            botaoAposta.innerHTML = "<td></td><td><input type='submit' value='Apostar'/>";
            break;
        }
        
        case 'secaCentena': {
            apostas.innerHTML = "<tr><td>Defina o valor da Centena: </td><td><input type='text' name='cetena'/></td></tr>";
            botaoAposta.innerHTML = "<tr><td></td><td><input type='submit' value='Apostar'/></td></tr>";
            break;
        }
        
        case 'centena1a5': {
            apostas.innerHTML = "<tr><td>Defina o valor da Centena: </td><td><input type='text' name='cetena'/></td></tr>";
            botaoAposta.innerHTML = "<td></td><td><input type='submit' value='Apostar'/></td>";
            break;
        }
        
        case 'secaMilhar':{
            apostas.innerHTML = "<tr><td>Defina o valor da Milhar: </td><td><input type='text' name='milhar'/></td></tr>";
            botaoAposta.innerHTML = "<td></td><td><input type='submit' value='Apostar'/></td>";
            break;
        }
        
        case 'milhar1a5': {
            apostas.innerHTML = "<tr><td>Defina o valor da Milhar: </td><td><input type='text' name='milhar'/></td></tr>";
            botaoAposta.innerHTML = "<td></td><td><input type='submit' value='Apostar'/></td>";
            break;
        }
        
        case 'milharCombinada': {
            apostas.innerHTML = "<tr><td>Defina o valor da Milhar: </td><td><input type='text' name='milhar'/></td></tr>";
            botaoAposta.innerHTML = "<td></td><td><input type='submit' value='Apostar'/></td>";
            break;
        }
        
        case 'milharCombinada1a5': {
            apostas.innerHTML = "<tr><td>Defina o valor da Milhar: </td><td><input type='text' name='milhar'/></td></tr>";
            botaoAposta.innerHTML = "<td></td><td><input type='submit' value='Apostar'/></td>";
            break;
        }
    }
}