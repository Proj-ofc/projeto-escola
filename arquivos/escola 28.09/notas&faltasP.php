<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'admin') {
    
    echo '    <form action="nota_proc.php" method="post">
    <table>
      <tr>
        <td>Aluno</td>
        <td>P1</td>
        <td>P2</td>
        <td>P3</td>
        <td>Extra</td>
        <td>Substitutiva</td>
        <td>Faltas</td>
      </tr>
      <tr>
        <td><input type="text" name="nomea" id="nomea"></td>
        <td><input type="number" name="P1" id="P1"></td>
        <td><input type="number" name="P2" id="P2"></td>
        <td><input type="number" name="P3" id="P3"></td>
        <td><input type="number" name="extra" id="extra"></td>
        <td><input type="number" name="sub" id="sub"></td>
        <td><input type="number" name="faltas" id="faltas"></td>
      </tr>
    </table>
    <button class="enviar" type="submit">ENVIAR</button>
  </form>';

}
else{
    header("Location: index.html");
    exit();
}

?>