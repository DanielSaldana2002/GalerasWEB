<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <div id="element-to-print">
    <h1>Simulación de un pdf</h1>
    <p>Este es un ejemplo de cómo crear un pdf a partir de html usando html2pdf.js</p>
    <div style="background-color: lightblue; padding: 15px; border: 2px solid black;">
      <p style="background-color: limegreen;">Este es un div con algunos estilos css</p>
    </div>
  </div>

  <script>
var element = document.getElementById("element-to-print");

// Opciones para la generación del pdf
var opt = {
  margin: 1, // Margen en pulgadas
  filename: "simulacion.pdf", // Nombre del archivo
  image: { type: "jpeg", quality: 0.98 }, // Tipo y calidad de la imagen
  html2canvas: { scale: 2 }, // Escala del canvas
  jsPDF: { unit: "in", format: "letter", orientation: "portrait" } // Opciones del jsPDF
};

// Crear el pdf y descargarlo
html2pdf().set(opt).from(element).save();

  </script>
</body>
</html>
