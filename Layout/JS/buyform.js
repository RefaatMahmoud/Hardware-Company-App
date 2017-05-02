var items = document.querySelectorAll(".product-bottom h4 a");
var h_price = document.querySelector(".price");
var h_label = document.querySelector(".label");
var info;

function getName_price(element) {
	element.addEventListener("click", function () {
		var price = this.nextElementSibling.textContent;
		var name = this.parentElement.previousElementSibling.childNodes[0].textContent;
		h_label.value = name;
		h_price.value = price;
		info = [h_label.value, h_price.value];
		console.log(info);
	}, false);

}

for (var x = 0; x < items.length; x++) {
	getName_price(items[x]);
}
