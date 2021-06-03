<!--cards-->
<div id="page-content" class="cards grid container">
    <?php if(empty($filter_vaga)): ?>

    <h3>Opss...<br>Nenhum profissional foi encontrado! :(</h3>

    <?php else: ?>
    <?php foreach($filter_vaga as $row): ?>
    <div class="item">
        <a href="<?= base_url('perfil').'/'.$row['id_usuario']; ?>">
        <div class="flex">
            <div class="title width-100 padding text-left">
                <span class="color-line-1"><?= $row['nm_profissao'].' - '.$row['nm_cidade']; ?></span>
                <div class="description"><?= $row['nm_usuario']; ?></div>
            </div>
            <button class="btn-more">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="36px" width="36px" role="img" aria-hidden="true"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"></path></svg>
            </button>
        </div>
        </a>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>