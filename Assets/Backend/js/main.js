
function showOption() {
	const menuChild = document.getElementById("menu-child").classList;
	menuChild.forEach(value => {
		if (value === "hide")
			menuChild.remove("hide");
		else menuChild.add("hide");
	});
};

function showOptionPhong() {
	const menuChild2 = document.getElementById("menu-child-2").classList;
	menuChild2.forEach(value => {
		if (value === "hide")
			menuChild2.remove("hide");
		else menuChild2.add("hide");
	});
};

