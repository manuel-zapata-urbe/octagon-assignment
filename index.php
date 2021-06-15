<?php

$wasSubmitted = $_POST['submit'];

$numberOfSides = $_POST['numberOfSides'];
$sidesValue = $_POST['sidesValue'];
$apothem = (float) $_POST['apothem'];

if ($apothem == 0) {
  $errorMessage = 'Error submitting the apothem.';
} else {
  $errorMessage = null;
}

if (isset($apothem) && isset($sidesValue) && isset($numberOfSides)) {
  // Area = N * L * ap / 2
  $area = (($numberOfSides * $sidesValue) * $apothem) / 2;
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>
  <title>Area de un octágono regular</title>
</head>

<body>
  <main class='w-6/12 m-auto p-2'>
    <div class='text-center border-2 border-green-300 rounded-md m-5 p-3'>
      <h2 class='text-xl my-7'>
        This webpage calculates the area of a regular octagon following
        this <a class='font-bold underline' href='https://www.universoformulas.com/matematicas/geometria/area-poligono-regular/' target='_blank'>formula</a>.
      </h2>
      <form method='POST' action=<?php echo $_SERVER['PHP_SELF']; ?>>
        <div>
          <label for='numberOfSides' class='block my-5 tracking-wider'>Number of sides (N)</label>
          <input 
            id='numberOfSides' 
            class='border border-green-300 rounded-md focus:ring-2 focus:ring-green-600 mx-4 
            p-2 hover:ring-1 hover:ring-green-400 w-1/2 text-sm text-black' 
            type='number' 
            name='numberOfSides' 
            value='0' 
          />
        </div>

        <div>
          <label for='sidesValue' class='block my-5 tracking-wider'>Value of each side (L)</label>
          <input 
            id='sidesValue' 
            class='border border-green-300 rounded-md focus:ring-2 focus:ring-green-600 mx-4 
            p-2 hover:ring-1 hover:ring-green-400 w-1/2 text-sm text-black' 
            type='number' 
            name='sidesValue' 
            value='0' 
          />
        </div>

        <div>
          <label for='apothem' class='block my-5 tracking-wider'>Apothem (ap)</label>
          <input 
            id='apothem' 
            class='border border-green-300 rounded-md focus:ring-2 focus:ring-green-600 mx-4 
            p-2 hover:ring-1 hover:ring-green-400 w-1/2 text-sm text-black' 
            type='text' 
            name='apothem' 
            placeholder='Integer or decimal'
          />
        </div>

        <?php
        if (!isset($area)) {
          echo '<p class="opacity-75 my-3">Click <em class="text-green-500">"calculate"</em> to see the result!</p>';
        } else {
          echo "<p class='opacity-75 my-3'>Resultado: <strong class='text-green-500'>$area</strong></p>";
        }

        echo (isset($errorMessage) && isset($wasSubmitted)) ? "<p class='text-red-400'>$errorMessage</p>" : '';
        ?>

        <button class='bg-green-300 hover:bg-green-400 text-white p-3 rounded-md my-3' type='submit' name='submit'>Calculate</button>
      </form>

      <p class='italic opacity-75 my-3'>Manuel Zapata - 27.971.134 - N1013</p>

    </div>
  </main>
  ?>
</body>

</html>