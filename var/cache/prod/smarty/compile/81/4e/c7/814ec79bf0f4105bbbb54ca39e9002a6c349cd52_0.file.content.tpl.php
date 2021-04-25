<?php
/* Smarty version 3.1.34-dev-7, created on 2021-04-17 04:49:42
  from '/home/fqmb6568/projet.aura-shop/ad_aura/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_607aa126025664_18810847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '814ec79bf0f4105bbbb54ca39e9002a6c349cd52' => 
    array (
      0 => '/home/fqmb6568/projet.aura-shop/ad_aura/themes/default/template/content.tpl',
      1 => 1616449200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607aa126025664_18810847 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>

<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
