function drag(event) {
	event.dataTransfer.setData('image',event.target.id);
}

function allowDrop(event) {
	event.preventDefault();
	var dropBasket = document.querySelector(".dropbasket");
	dropBasket.style.boxShadow = "3px 2px 1px 23px #000";
}

function drop(event) {
	event.preventDefault();
	var data = event.dataTransfer.getData('image');
	event.target.appendChild(document.getElementById(data));

	var dropBasket = document.querySelector(".dropbasket");
	dropBasket.style.boxShadow = "none";
}