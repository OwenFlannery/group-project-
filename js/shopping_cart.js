
function calculate()
{
	//variables declared
	var item1 = 0; var item2 = 0; var item3 = 0; var item4 = 0; var item5 = 0; var item6 = 0;
	var tot1 = 0; var tot2 = 0; var tot3 = 0; var tot4 = 0; var tot5 = 0; var tot6 = 0;

	//prices declared
	var Prc1 = 199.99; var Prc2 = 45; var Prc3 = 5; var Prc4 = 3.50; var Prc5 = 85; var Prc6 = 105.05;

	//if statement to calculate the total of the 1st item added to cart
	if (document.getElementById("item1").value > "")
	{
		item1 = document.getElementById("item1").value;
	}

	//price for item 1 total printed to screen
	tot1 = eval(item1) * eval(Prc1);
	tot1 = tot1.toFixed(2);
	document.getElementById("total1").value = tot1;

	if (document.getElementById("item2").value > "")
	{
		item2 = document.getElementById("item2").value;
	}

	//ITEM 2
	tot2 = eval(item2) * eval(Prc2);
	tot2 = tot2.toFixed(2);
	document.getElementById("total2").value = tot2;

	if (document.getElementById("item3").value > "")
	{
		item3 = document.getElementById("item3").value;
		}

	//ITEM3
	tot3 = eval(item3) * eval(Prc3);
	tot3 = tot3.toFixed(2);
	document.getElementById("total3").value = tot3;

	if (document.getElementById("item4").value > "")
	{
		item4 = document.getElementById("item4").value;
	}

	//ITEM 4
	tot4 = eval(item4) * eval(Prc4);
	tot4 = tot4.toFixed(2);
	document.getElementById("total4").value = tot4;

	if (document.getElementById("item5").value > "")
	{
		item5 = document.getElementById("item5").value;
	}

	//ITEM 5
	tot5 = eval(item5) * eval(Prc5);
	tot5 = tot5.toFixed(2);
	document.getElementById("total5").value = tot5;

	if (document.getElementById("item6").value > "")
	{
		item6 = document.getElementById("item6").value;
	}

	//ITEM6
	tot6 = eval(item6) * eval(Prc6);
	tot6 = tot6.toFixed(2);
	document.getElementById("total6").value = tot6;

	//entire cart total printed to the screen
	Totamt = eval(tot1) + eval(tot2) + eval(tot3) + eval(tot4) + eval(tot5) + eval(tot6);
	Totamt = Totamt.toFixed(2);
	document.getElementById("GrandTotal").value = Totamt;
}