var slide = document.querySelectorAll(".slide");
var dots = document.querySelectorAll(".dots a");
var description = document.querySelectorAll(".description");  
var i;
var sliderInterval = new Array(5);
for (i = 0; i < dots.length; i++) {

	clickMe(dots[i], slide[i],description[i]);

}

sliding();
var interval = setInterval(sliding, 40000);



function clickMe(element1, element2,element3) {
	"use strict";

	element1.addEventListener("click", function () {
		clearInterval(interval);
		clearAuto();
		if (!element1.classList.contains("active")) {
			hide(slide);
			dectivate(dots);
			this.classList.add("active");
			element2.classList.remove("hide");
			element2.classList.add("show");
			element3.classList.add("move");
		}
	});
}

function hide(e) {
	var x;
	for (x = 0; x < e.length; x++) {
		e[x].classList.add("hide");
	}
}

function dectivate(e) {
	var x;
	for (x = 0; x < e.length; x++) {
		e[x].classList.remove("active");
	}
}

function activateFirst(element1, element2) {
	element1[0].classList.add("active");
	element2[0].classList.remove("hide");
}

function auto(element1, element2,element3,time) {

	var time = setTimeout(function () {
		hide(slide);
		dectivate(dots);
		element1.classList.add("active");
		element2.classList.remove("hide");
		element2.classList.add("show");
		element3.classList.add("move");
	}, time);

	return time;
}

function sliding() {

	var x, time;
	for (x = 0; x < dots.length; x++) {
		time = (x) * 8000;
		sliderInterval[x] = auto(dots[x], slide[x],description[x] ,time);

	}

}

function clearAuto() {
	for (var x = 0; x < sliderInterval.length; x++) {
		clearTimeout(sliderInterval[x]);
	}
}
