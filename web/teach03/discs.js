// Global variable to keep track of items added to cart
var counter = 0;


function addToCart(discType, plastic, weight, quantity){
    // Don't add to cart if there is no quantity
    if(quantity ==0){
        return;
    }
    
    // Increment count when item is added to cart
    // Max limit of 10 items in cart
    counter++;
    if(counter >= 11) {
      document.getElementById("add").disabled=true;
      return;
    }
    
    // Add new table row and cell data to table  
    var table = document.getElementById("priceTable");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = "Disc selected:";
    cell2.value = plastic;
    cell2.name = "PLASTICS";
    cell3.innerHTML = discType + ", " + weight + "g";
    cell4.innerHTML = "x" + quantity;
    cell4.value = quantity;

    // Change innerHTML for display purposes
    if(plastic == 8.99){
        plastic = cell2.innerHTML = "DX plastic: $8.99";        
    }
    if(plastic == 16.99){
        plastic = cell2.innerHTML = "Champion plastic: $16.99";
    }
    if(plastic == 19.99){
        plastic = cell2.innerHTML = "Star plastic: $19.99";
    }   
    
    // Set values of hidden item elements to disc values, formatted nicely
    for(var i = 0; i < table.rows.length-4; i++){
        var num = i + 1;
        if(document.getElementById("item" + num).value == ""){
          document.getElementById("item" + num).value = discType + ", " + plastic + ", " + weight + "g, " + "x" + quantity ;
        }
        
    }
    
    // Calculate cost of all items in cart  
    calculateCost();
}

function calculateCost(){
    var maxLength = document.getElementById("priceTable").rows.length-1;
    var table = document.getElementById("priceTable");
    var singleDiscCost = 0.0;
    var discCostCummulative = 0.0;
    var numDiscs;
    discCostCummulative += singleDiscCost;
    
    // Loop through newly created table cells of plastic cost and quantity for calculating cummulative disc cost
    for(var i = 0; i < maxLength-3; i++){
        singleDiscCost = table.rows[i].cells[1].value * table.rows[i].cells[3].value;
        discCostCummulative += singleDiscCost;
    }
    
    // Display cost of discs
    document.getElementById("priceTable").rows[maxLength-3].cells[1].innerHTML = "$" + discCostCummulative.toFixed(2);
    
    
    // Calculate and display tax (6% in Idaho)
    var tax = 0.06 * discCostCummulative;
    document.getElementById("priceTable").rows[maxLength-2].cells[1].innerHTML = "$" + tax.toFixed(2);
    
    // Use flat rate for shipping
    var shipping = 3.00;
    document.getElementById("priceTable").rows[maxLength-1].cells[1].innerHTML = "$" + shipping.toFixed(2);
    
    // Calculate and display total cost
    var total = discCostCummulative + tax + shipping;
    document.getElementById("priceTable").rows[maxLength].cells[1].innerHTML = "$" + total.toFixed(2);
    
    // For hidden element, easy access to total value for php
    document.getElementById("totalPrice").value = total.toFixed(2);
}

function checkInput(input, id) {
    var validPattern = /\w+/
    if(input.match(validPattern)) {
        document.getElementById(id).style.visibility = 'hidden';
    } else {
        document.getElementById(id).style.visibility = 'visible';
    }
}

function checkState(input, id, id2) {
    var stringSize = input.split(" ");
    document.getElementById(id).pattern = "A[KLZR]|C[AOT]|DE|FL|GA|HI|I[DLNA]|K[SY]|LA|M[EDAINSOT]|N[EVHJMYCD]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[TA]|W[AVIY]";
    document.getElementById(id).title = "A correct two letter state abbreviation, both letters capitalized";
    var validPattern = /^\s*A[KLZR]\s*$|^\s*C[AOT]\s*$|^\s*DE\s*$|^\s*FL\s*$|^\s*GA\s*$|^\s*HI\s*$|^\s*I[DLNA]\s*$|^\s*K[SY]\s*$|^\s*LA\s*$|^\s*M[EDAINSOT]\s*$|^\s*N[EVHJMYCD]\s*$|^\s*O[HKR]\s*$|^\s*PA\s*$|^\s*RI\s*$|^\s*S[CD]\s*$|^\s*T[NX]\s*$|^\s*UT\s*$|^\s*V[TA]\s*$|^\s*W[AVIY]\s*$/;
    if(input.match(validPattern)) {
      document.getElementById(id2).style.visibility = 'hidden';
    } else {
          document.getElementById(id2).style.visibility = 'visible';
  }
}

function checkZip(input, id, id2) {
    document.getElementById(id2).pattern = "[0-9]{5}";
    document.getElementById(id2).title = "A 5 digit number with no spaces";
    var validPattern = /^\s*\d{5}\s*$/;
    if(input.match(validPattern)) {
      document.getElementById(id).style.visibility = 'hidden';
    } else {
          document.getElementById(id).style.visibility = 'visible';
    }
}

function checkCreditCard(input, id, id2) {
    document.getElementById(id).pattern = "[0-9]{16}";
    document.getElementById(id).title = "A 16 digit number with no spaces between digits";
    var validPattern = /^\s*\d{4}\d{4}\d{4}\d{4}\s*$/;
    if(input.match(validPattern)) {
      document.getElementById(id2).style.visibility = 'hidden';
    } else {
          document.getElementById(id2).style.visibility = 'visible';
    }
}

function checkDate(input, id, id2) {
    document.getElementById(id).pattern = "[0-1][0-9]\/[1-9][0-9]";
    document.getElementById(id).title = "A date formated 01/19, cannot be a date in the past";
    var validPattern = /^\s*\d{2}\/\d{2}\s*$/;
    if(input.match(validPattern)){
        var nums = input.split("/");
        console.log(nums[1]);
        if((nums[0] > 0 && nums[0] < 13) &&
          nums[1] >= 18){
              if(nums[1] == 18 && nums[0] < 11){
                  document.getElementById(id2).style.visibility = 'visible'; 
                  document.getElementById(id).pattern = "[E]";
              }else {
                  document.getElementById(id2).style.visibility = 'hidden';
              }
        } else {
             document.getElementById(id2).style.visibility = 'visible';
             document.getElementById(id).pattern = "[E]";
          }
    } else {
        document.getElementById(id2).style.visibility = 'visible';
        document.getElementById(id).pattern = "[E]";
    }
}

function checkCVV(input, id, id2) {
    var validPattern = /^\s*\d{3}\s*$/;
    document.getElementById(id2).pattern = "[0-9]{3}";
    document.getElementById(id).title = "A 3 digit number with no spaces";
    if(input.match(validPattern)) {
        document.getElementById(id2).style.visibility = 'hidden';
    } else {
        document.getElementById(id2).style.visibility = 'visible';
    }
}

function checkPhone(input, id, id2) {
    document.getElementById(id).pattern ="[0-9]{3}\-[0-9]{3}\-[0-9]{4}";
    document.getElementById(id).title = "A phone number following this format: 123-123-1234, with no parentheses";
    var validPattern = /^\s*((\d{3}\-\d{3}\-)|(\d{3}\d{3}))\d{4}\s*$/;
    if(input.match(validPattern)) {
      document.getElementById(id2).style.visibility = 'hidden';
    } else {
          document.getElementById(id2).style.visibility = 'visible';
    }
}

function submitForm() {
    alert("Submitted successfully");
}

function resetValues(id) {
    document.getElementById(id).reset();
}