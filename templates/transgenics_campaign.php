<?php
/**
 * Template Name: Campanha Transgênicos
 *
 * @package WordPress
 * @subpackage AS-PTA
 * @since AS-PTA 0.2
 */
?>
<?php dynamic_sidebar('gm-sidebar'); ?>
<section class="campanha-transgenicos">

  <div class="titulo-pagina">
      <h1><?php the_title(); ?></h1>
  </div>

  <div class="clearfix"></div>
      <div class="tema-card">
        <a href="<?php get_site_url(); ?>/itens-de-campanha/boletim/">
          <div class="tema-box">
            <div class="tema-descricao">
              <p>Desde 1999 a AS-PTA produz semanalmente o boletim "Por Um Brasil Livre de Transgênicos", que traz, a partir de um ponto de vista independente, a situação do Brasil e de outros países em relação aos organismos transgênicos. Por meio do Boletim você acompanha uma análise do que é noticiado na imprensa e ainda conhece experiências em agroecologia que mostram porque os transgênicos não são solução para a agricultura. Participe! Envie informações, divulgações de eventos e sugestões para boletim@aspta.org.br</p>
            </div>
            <div class="tema-icone"><img class="image-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/boletim.png"></div>
            <div class="tema-titulo">Boletim</div>
          </div>
        </a>
      </div>
      <div class="tema-card">
        <a href="<?php get_site_url(); ?>/itens-de-campanha/gm-free-brazil/">
          <div class="tema-box-verde">
             <div class="tema-descricao">
              <p>Find here information about the ongoing situation of GMOs and biosafety politics in Brazil. Subscribe to monthly AS-PTA s Update from the GM-Free Brazil Campaign emailing boletim@aspta.org.br</p>
            </div>
           <div class="tema-icone"><img class="image-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/gm-free-brasil.png"></div>
            <div class="tema-titulo">GM FREE Brasil</div>
          </div>
        </a>
      </div>
      <div class="tema-card">
        <a href="<?php get_site_url(); ?>/itens-de-campanha/materiais-de-campanha/">
          <div class="tema-box">
            <div class="tema-descricao">
              <p>Aqui você encontra materiais de comunicação e formação sobre os transgênicos e seus impactos. São todos de livre uso.</p>
            </div>
            <div class="tema-icone"><img class="image-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/materiais-de-campanha.png"></div>
            <div class="tema-titulo">Materiais de Campanha</div>
          </div>
        </a>
      </div>
      <div class="tema-card">
        <a href="<?php get_site_url(); ?>/itens-de-campanha/monitoramento-ctnbio/">
          <div class="tema-box-verde">
            <div class="tema-descricao">
              <p>A Comissão Técnica Nacional de Biossegurança é o órgão do Governo Federal responsável pela análise das liberações de transgênicos. Confira nesta seção votos, relatórios e pareceres de especialistas que discordaram das decisões da CTNBio.</p>
            </div>
            <div class="tema-icone"><img class="image-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/monitoramento-da-ctnbio.png"></div>
            <div class="tema-titulo">Monitoramento da CTNBio</div>
          </div>
        </a>
      </div>
      <div class="tema-card">
        <a href="<?php get_site_url(); ?>/itens-de-campanha/campanha-transgenicos/">
          <div class="tema-box">
            <div class="tema-descricao">
              <p>Contrariando os planos da indústria, os transgênicos se tornaram tema de debate público. Confira aqui artigos, notícias e documentos publicados nos últimos dez anos.</p>
            </div>
            <div class="tema-icone"><img class="image-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/transgenicos.png"></div>
            <div class="tema-titulo">Transgênicos</div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
