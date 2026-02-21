<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifolio de Ana Claudia Nogueira</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-[#16181D] text-gray-200">
    <?php include('./components/header.php'); ?>
    <main class="mx-auto max-w-screen-lg min-h-20 px-3 py-6">
       
        <!-- Projetos -->
        <section class="space-y-3 py-6" id="projetos">
           <?php include('./components/projects.php'); ?>
        </section>
        <!-- Rodapé -->
       <?php include("./components/footer.php"); ?>
    </main>
</body>

</html>