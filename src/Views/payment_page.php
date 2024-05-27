<!DOCTYPE html>
<html>
<head>
    <title>Pagamento do Curso</title>
</head>
<body>
    <h1>Pagamento do Curso</h1>
    <p>Curso: <?php echo $courseName; ?></p>
    <p>Preço: <?php echo $coursePrice; ?></p>
    <form action="https://gatewaydepagamento.com/pagar" method="POST">
        <input type="hidden" name="amount" value="<?php echo $coursePrice; ?>">
        <input type="hidden" name="description" value="Pagamento pelo curso <?php echo $courseName; ?>">
        <input type="hidden" name="callback_url" value="<?php echo $callbackUrl; ?>">
        <button type="submit">Pagar</button>
    </form>
</body>
</html>
