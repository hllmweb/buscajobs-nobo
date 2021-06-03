cabecalho

<?= 
    //$hash_acesso;
   print_r($lista);

    foreach($lista as $row):
        $url = base_url($row['controller'].'/'.$row['metodo']);
        echo "<a href='".$url."'>".$row['menu']."</a>";
    endforeach;
?>
<br>
<?= $nome ?>
<br>
<a href="<?= base_url('dashboard/logout'); ?>">Sair</a>

