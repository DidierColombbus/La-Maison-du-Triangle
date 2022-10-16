<!-- On retrouvera au dessus le contenu à afficher -->

<footer class="navigation container w-100 p-1">

<br>

<!-- Intégration via date() de l'année en cours pour le copyright fictif -->
    <div class="row d-inline">
    <a href="https://fr-fr.facebook.com/" target="_blank" rel="noopener noreferrer"><img src="../img/icons/facebook.svg" alt="" srcset=""></a>
    <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer"><img src="../img/icons/twitter.svg" alt="" srcset=""></a>
    <a href="https://youtube.com/" target="_blank" rel="noopener noreferrer"><img src="../img/icons/youtube.svg" alt="" srcset=""></a>
    <a href="https://github.com/DidierColombbus?tab=repositories/" target="_blank" rel="noopener noreferrer"><img src="../img/icons/github.svg" alt="" srcset=""></a>
    <a href="https://instagram.com/" target="_blank" rel="noopener noreferrer"><img src="../img/icons/instagram.svg" alt="" srcset=""></a>
    <a href="https://snapchat.com/" target="_blank" rel="noopener noreferrer"><img src="../img/icons/snapchat.svg" alt="" srcset=""></a>
    </div>
    <br>
    <?php
        echo "<p>" . date("Y") . " © <i>U->Surf</i></p>";
    ?>

</footer>


<!-- En vue d'un débuggage du menu bootstrap, travail en cours : -->
<script>
document.addEventListener("DOMContentLoaded", function(){
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(element){
        return new bootstrap.Tooltip(element);
    });
});
</script>

<!-- Bibliothèque jquery -->
<script src="../popper/popper.min.js"></script>

<!-- On retrouve ici les balises fermantes de <body> et <html> ouvertes dans header.inc.php -->
</body>
</html>