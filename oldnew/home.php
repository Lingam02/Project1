<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <title>Family Budget Entry Form</title>
</head>

<body>

  <div class="container mt-5">
    <form id="budgetForm">
      <!-- Income Section -->
      <h3>Income</h3>
      <input type="number" class="multi" value="0" name="one" id="one">
      <input type="number" class="multi" value="0" name="two" id="two">
      <input type="number" name="result" id="result">
      <div class="form-group">
        <label for="mainSource">Main Source:</label>
        <input type="text" class="form-control" id="mainSource" placeholder="Enter main source">
      </div>
      <div class="form-group">
        <label for="incomeAmount">Amount:</label>
        <input type="number" class="form-control" id="incomeAmount" placeholder="Enter amount">
      </div>

      <!-- Expenses Section -->
      <h3>Expenses</h3>
      <!-- Housing -->
      <div class="form-group">
        <label for="rent">Rent/Mortgage:</label>
        <input type="number" class="form-control expense" id="rent" placeholder="Enter amount">
      </div>
      <div class="form-group">
        <label for="utilities">Utilities:</label>
        <input type="number" class="form-control expense" id="utilities" placeholder="Enter amount">
      </div>
      <div class="form-group">
        <label for="propertyTaxes">Property Taxes:</label>
        <input type="number" class="form-control expense" id="propertyTaxes" placeholder="Enter amount">
      </div>

      <!-- Continue with other expense categories -->

      <!-- Total and Net Income -->
      <div class="form-group">
        <label>Total Income:</label>
        <input type="text" class="form-control" id="totalIncome" readonly>
      </div>
      <div class="form-group">
        <label>Total Expenses:</label>
        <input type="text" class="form-control" id="totalExpenses" readonly>
      </div>
      <div class="form-group">
        <label>Net Income:</label>
        <input type="text" class="form-control" id="netIncome" readonly>
      </div>
      <button type="button" class="btn btn-primary" onclick="calculateBudget()">Calculate</button>
    </form>
  </div>

  <script src="js/home.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>