<?php
/* Smarty version 3.1.34-dev-7, created on 2021-04-17 04:48:39
  from '/home/fqmb6568/projet.aura-shop/themes/classic/templates/catalog/_partials/product-flags.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_607aa0e7a82776_77164128',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43cc69f6cc355cca2f99629ef02eb71b36555db2' => 
    array (
      0 => '/home/fqmb6568/projet.aura-shop/themes/classic/templates/catalog/_partials/product-flags.tpl',
      1 => 1616449200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607aa0e7a82776_77164128 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '2073758155607aa0e7a7fcf1_74651649';
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1774253403607aa0e7a80629_30020190', 'product_flags');
?>

<?php }
/* {block 'product_flags'} */
class Block_1774253403607aa0e7a80629_30020190 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_flags' => 
  array (
    0 => 'Block_1774253403607aa0e7a80629_30020190',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <ul class="product-flags">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
?>
            <li class="product-flag <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
<?php
}
}
/* {/block 'product_flags'} */
}
