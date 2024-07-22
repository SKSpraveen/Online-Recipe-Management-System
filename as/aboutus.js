function myFunction(){
	//get the Checkbox
	var checkbox=document.getElementById("myCheck");
	//get the output Text
	var text=document.getElementById("text");
	//if the checkbox checked,display output
	if(checkbox.checked==true){
		text.style.display="none";
	}else {
		text.style.display="block";
	}
	
}
function seemore() {
    var element = document.getElementById("seemore");
    element.style.color = "rgb(235, 247, 7)";
    element.innerHTML = "Our team is composed of highly skilled professionals with expertise in recipe making. We believe in our ability and strive to our goals. Our commitment to excellence and customer satisfaction has helped us be the no 1 recipe site in Sri Lanka.";
    element.style.fontFamily = "'Comic Sans MS', cursive";
    element.style.fontSize = "20px"; 
}

