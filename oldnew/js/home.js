
function calculateBudget() {
  let totalIncome = parseFloat(document.getElementById('incomeAmount').value) || 0;
  let totalExpenses = 0;

  // Loop through expense inputs and add up their values
  document.querySelectorAll('.expense').forEach(function(expenseInput) {
    totalExpenses = totalExpenses + parseFloat(expenseInput.value) || 0;
  });

  // Update total income, total expenses, and net income fields
  document.getElementById('totalIncome').value = totalIncome.toFixed(2);
  document.getElementById('totalExpenses').value = totalExpenses.toFixed(2);
  document.getElementById('netIncome').value = (totalIncome - totalExpenses).toFixed(2);
}
let one = document.getElementById('one');
let two = document.getElementById('two');
let result = document.getElementById('result');
document.querySelectorAll('.multi').forEach(element => {
  element.addEventListener("input", function multi() {
    result.value = (one.value * two.value).toFixed(3);
  })
});

