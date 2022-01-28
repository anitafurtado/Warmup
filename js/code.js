window.onload=function(){
  // if(window.location.pathname==="Warmup/index.php"){
    console.log("here");
    bindings();
  // }
}




function playNote(frequency){
    //this code is inspired from: https://www.youtube.com/watch?v=vtDGTwxVkOA
    let note = new AudioContext();
    let osc = note.createOscillator();
    let gain = note.createGain();
    osc.connect(gain);
    osc.frequency.value=frequency;
    gain.connect(note.destination);
    osc.start(0);
    gain.gain.exponentialRampToValueAtTime(0.0001,note.currentTime+1);
}

function noteClickHandler(){
    playNote(this.dataset.id);
}

function bindings(){
    document.getElementById("c4").onclick = noteClickHandler;
    document.getElementById("d").onclick = noteClickHandler;
    document.getElementById("e").onclick = noteClickHandler;
    document.getElementById("f").onclick = noteClickHandler;
    document.getElementById("g").onclick = noteClickHandler;
    document.getElementById("a").onclick = noteClickHandler;
    document.getElementById("b").onclick = noteClickHandler;
    document.getElementById("c5").onclick = noteClickHandler;

}
