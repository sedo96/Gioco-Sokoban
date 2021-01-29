var start_Date;
var count;
var timer;
var hours; 
var minutes;
var seconds;
var Window;
var level_selected;
var level;


// Elemento		      Carattere
// Muro                  ?         
// Giocatore             P                 
// Scatola               $         
// Meta					 O   

var level1 = [
  ["?", "?", " ", " ", " ", " ", "?"],
  ["?", " ", "P", " ", "$", " ", " "],
  ["?", " ", " ", " ", "?", "?", " "],
  ["?", "?", " ", " ", "?", " ", " "],
  ["O", " ", " ", " ", "$", " ", " "],
  ["O", " ", " ", " ", " ", " ", "?"],
  ["?", " ", "?", "?", "?", "?", "?"],
];

var level2 = [
  [" ", " ", " ", "P", " ", "?", "?"],
  [" ", "$", "$", " ", "?", "?", " "],
  [" ", " ", " ", " ", " ", " ", " "],
  ["?", "?", "?", " ", " ", " ", "?"],
  ["O", " ", " ", " ", "?", " ", "?"],
  ["O", " ", " ", " ", " ", " ", "?"],
  ["?", " ", " ", "?", " ", " ", " "],
];

var level3 = [
  ["?", "?", "?", "?", " ", " ", "?"],
  ["?", "?", " ", " ", " ", " ", "?"],
  ["P", " ", " ", "$", " ", "?", "?"],
  ["?", " ", " ", " ", " ", " ", "?"],
  ["O", " ", " ", "?", " ", " ", " "],
  ["O", " ", " ", "?", " ", "$", " "],
  ["?", "?", " ", "?", " ", " ", "?"],
];

var level4 = [
  ["?", " ", " ", " ", " ", " ", "?"],
  [" ", "$", "?", "?", " ", " ", " "],
  [" ", " ", " ", " ", " ", " ", "?"],
  ["?", " ", " ", " ", "P", "?", "?"],
  ["O", " ", " ", "?", " ", " ", "?"],
  ["O", " ", "$", "?", " ", " ", " "],
  [" ", "?", " ", " ", " ", "?", "?"],
];

var level5 = [
  ["?", "?", "?", " ", " ", " ", "?"],
  [" ", "?", " ", " ", " ", "$", " "],
  [" ", " ", "?", " ", " ", " ", " "],
  ["?", " ", " ", " ", " ", "?", " "],
  ["O", " ", " ", "?", " ", "$", " "],
  ["O", " ", " ", " ", " ", " ", " "],
  ["?", "P", " ", "?", "?", "?", "?"],
]


function start(){

	count = 0;
	level = 1;
	
	
	document.getElementById("newgame").hidden = true;
	document.getElementById("resa").hidden = false;
	document.getElementById("resa").disabled = false;
	document.getElementById("resa").setAttribute("class","hover");
	
	document.getElementById("livello").innerHTML = "Livello: 1";
	document.getElementById("spostamenti").innerHTML = "Mosse: 0";
	
	level_selected = level1;
	
	
	create_Table();
	document.addEventListener("keydown", spostamento);
	
	
	start_Date = new Date().getTime();
	
	start_Timer();
	
}

var matriceAppoggio = [      //matrice di appoggio in cui mi salvo i nodi quando creo la tabella
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0, 0, 0],
];

function Count_Time() // var globali
{
	var current_Date = new Date().getTime();
	var current_time = current_Date - start_Date;
	var tempo = document.getElementById("tempo");

	hours = Math.floor((current_time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	minutes = Math.floor((current_time % (1000 * 60 * 60)) / (1000 * 60));
	seconds = Math.floor((current_time % (1000 * 60)) / 1000);

	if(hours>0)
		tempo.innerHTML = "Tempo: " + hours + "h " + minutes + "m " + seconds + "s "; 
	else if(minutes>0)
		tempo.innerHTML = "Tempo: " + minutes + "m " + seconds + "s ";
	else
		tempo.innerHTML = "Tempo: " + seconds + "s ";
}


function stop_Timer()
{
	clearTimeout(timer);

}


function start_Timer()
{
	timer = setInterval(Count_Time,1000);
}

function create_Table() {
	
	var table, cell, i, j, node, row, griglia;
	griglia = document.getElementById("griglia");
	
	while(griglia.childElementCount != 0) 
		griglia.removeChild(griglia.firstChild);
	
	
		for (i=0; i<7; i++)
		{
			row = document.createElement("tr");				
				
				for (j=0; j<7; j++)
				{
					table = document.createElement("table");
					
					cell = document.createElement("td");
					
					node = document.createElement("div");
					
					node.setAttribute("value",level_selected[i][j]);
					
					matriceAppoggio[i][j] = node;
					
				
					if (level_selected[i][j] === " ") {
						node.className = "vuoto";
					}
								
					if (level_selected[i][j] === "?") {
						node.className = "muro";
					}
					
					if (level_selected[i][j] === "$") {
						node.className = "scatola";
					}
					
					if (level_selected[i][j] === "P") {
						node.className = "protagonista";
					}
					
					if (level_selected[i][j] === "O") {
						node.className = "meta";
					}
					
					
					cell.appendChild(node);
					row.appendChild(cell);						
				}
					
			table.appendChild(row);
			griglia.appendChild(row);
		}
}

function conta() {
	count++;
	document.getElementById("spostamenti").innerHTML = "Mosse: "+count;
}

function level_next() {

	level++;

	alert("Livello successivo!!");

	document.getElementById("livello").innerHTML = "Livello: " + level;
	
	switch(level) {
		case 2:
			level_selected = level2;
			break;
		
		case 3:
			level_selected = level3;
			break;
			
		case 4:
			level_selected = level4;
			break;
			
		case 5:
			level_selected = level5;
			break;
	}
	create_Table();
}

	
function spostamento() {

	var mosse = document.getElementById("spostamenti");
	
	var node = new Array();
	node = matriceAppoggio;
	var i, j, row, table, cell, node, h;
	h = 0;
	for (i = 0; i <= 6; i++) {
		for (j = 0; j <= 6; j++) {
			
			if (level_selected[i][j] === "P") {
				event.preventDefault();
				switch(event.keyCode) {
					case 37:
						//console.log(node);
						
						if(level_selected[i][j-1] === " ") {  //se a sinistra ho libero, scambio il protagonista con la cella vuota
							level_selected[i][j-1] = "P";
							node[i][j].className = "vuoto";
							level_selected[i][j] = " ";
							node[i][j-1].className = "protagonista";
							conta();
						}
						
						if(level_selected[i][j-1] === "$") {  //se a sinistra ho una scatola, sposto la scatola e il protagonista (anche se avessi la meta)
							if(level_selected[i][j-2] === " ") {
								level_selected[i][j-2] = "$";
								node[i][j-2].className = "scatola";
								level_selected[i][j-1] = "P";
								node[i][j-1].className = "protagonista";
								level_selected[i][j] = " ";
								node[i][j].className = "vuoto";
								conta();
							}
						}
						
						if(level_selected[i][j-2] === "O" && level_selected[i][j-1] === "$") {
							level_selected[i][j-2] = "$";
							node[i][j-2].className = "scatola";
							level_selected[i][j-1] = "P";
							node[i][j-1].className = "protagonista";
							level_selected[i][j] = " ";
							node[i][j].className = "vuoto";
							if(node[i][j-2].className === "scatola" && (node[i+1][j-2].className === "scatola" || node[i-1][j-2].className === "scatola")) {
								if (level === 5) {
									vittoria();
								}
								else {
									level_next();
								}
							}
						}
						break;
					
					case 38:
						if(level_selected[i-1][j] === " ") {			//se sopra ho la cella libera, sposto il protagonista
							
							level_selected[i-1][j] = "P";
							node[i-1][j].className = "protagonista";
							level_selected[i][j] = " ";
							node[i][j].className = "vuoto";
							conta();
							
						}
						if(level_selected[i-1][j] === "$") {
							if(level_selected[i-2][j] === " ") {
								level_selected[i-2][j] = "$";
								node[i-2][j].className = "scatola";
								level_selected[i-1][j] = "P";
								node[i-1][j].className = "protagonista";
								level_selected[i][j] = " ";
								node[i][j].className = "vuoto";
								conta();
							}
						}
						break;
					
					case 39:
						if(h<1) {
							if(level_selected[i][j+1] === " ") {  //se a destra ho libero, scambio il protagonista con la cella vuota
								level_selected[i][j+1] = "P";
								node[i][j+1].className = "protagonista";
								level_selected[i][j] = " ";
								node[i][j].className = "vuoto";
								//console.log(j);
								h++
								conta();
								
							
							}
						
							if(level_selected[i][j+1] === "$") {  //se a destra ho una scatola, sposto la scatola e il protagonista
								if(level_selected[i][j+2] === " ") {
									level_selected[i][j+2] = "$";
									node[i][j+2].className = "scatola";
									level_selected[i][j+1] = "P";
									node[i][j+1].className = "protagonista";
									level_selected[i][j] = " ";
									node[i][j].className = "vuoto";
									h++;
									conta();
								}
							}
						}
						break;
						
					case 40:
						if(h<1) {
							if(level_selected[i+1][j] === " ") {	//se sotto ho la cella libera, sposto il protagonista
								level_selected[i+1][j] = "P";
								node[i+1][j].className = "protagonista";
								level_selected[i][j] = " ";
								node[i][j].className = "vuoto";
								h++;
								conta();
								//console.log(i);
							}	
							if(level_selected[i+1][j] === "$") {
								if(level_selected[i+2][j] === " ") {
									level_selected[i+2][j] = "$";
									node[i+2][j].className = "scatola";
									level_selected[i+1][j] = "P";
									node[i+1][j].className = "protagonista";
									level_selected[i][j] = " ";
									node[i][j].className = "vuoto";
									h++;
									conta();
								}
							}
						}
						break;
						
							
				}
			}					
		}			
	}
}


function open_window()
{	
	Window=window.open('','','width=600,height=600');
	Window.document.open();
	Window.document.writeln('<!DOCTYPE html>');
	Window.document.writeln('<html lang="it">');
	Window.document.writeln('<head>');
	Window.document.writeln('<meta charset="utf-8"> ');
	Window.document.writeln('<meta name = "author" content = "author">');
	Window.document.writeln('<title>Complimenti! Hai Vinto!!</title>');
	Window.document.writeln('<link rel="stylesheet" href="../css/Vittoria.css" type="text/css" media="screen"> <!-- css -->');
	Window.document.writeln('</head>');
	Window.document.writeln('<body>');
	Window.document.writeln('<h1>Hai Vinto</h1>');
	Window.document.writeln('<hr>');
	Window.document.writeln('<h2>Hai completato il sokoban in ' + count + ' mosse con un tempo di ' + hours + ':' + minutes + ':' + seconds +'</h2>');
	Window.document.writeln('<br>');
	Window.document.writeln('<h2>Il tuo punteggio è stato salvato </h2>');
    Window.document.writeln('</body>');
	Window.document.writeln('</html>');

	setTimeout("close_window()", 6000);
}
	
function close_window()
{ 
	Window.close(); 
	window.location.href = "../php/Gioco.php";
}


function vittoria() {
		alert("Vittoria!!");
		stop_Timer();
		
		var xmlHttp, string, time;  
		
		try { xmlHttp=new XMLHttpRequest(); }
		catch (e) 
		{	
			try 
				{ xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); }
			catch (e) 
			{   
				try { xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }      
				catch (e) 
				{	
					window.alert("Your browser does not support AJAX!");        
					return;      
				}   
			} 
		} 
		
		time = hours + ":" + minutes + ":" + seconds;
		string = "?count=" + count + "&time=" + time;
		console.log(string);
	
	
		xmlHttp.open("GET","../php/PunteggioPartita.php" + string,true);
		xmlHttp.onreadystatechange = useHttpResponse;
		xmlHttp.send(null);

		function useHttpResponse() {	
			if(xmlHttp.readyState == 4) 					
				open_window();
		}
		
}
