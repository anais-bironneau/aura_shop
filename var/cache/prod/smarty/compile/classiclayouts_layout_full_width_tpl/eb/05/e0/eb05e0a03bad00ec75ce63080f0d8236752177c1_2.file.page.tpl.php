<?php
/* Smarty version 3.1.34-dev-7, created on 2021-04-17 04:48:39
  from '/home/fqmb6568/projet.aura-shop/themes/classic/templates/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_607aa0e7ad99e2_03722317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb05e0a03bad00ec75ce63080f0d8236752177c1' => 
    array (
      0 => '/home/fqmb6568/projet.aura-shop/themes/classic/templates/page.tpl',
      1 => 1616449200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607aa0e7ad99e2_03722317 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_826093621607aa0e7ad5898_19126298', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_1854985403607aa0e7ad60b6_08869350 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_1035096062607aa0e7ad5c47_35246148 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1854985403607aa0e7ad60b6_08869350', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_1669260868607aa0e7ad8279_17715653 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_1326390658607aa0e7ad8751_03571892 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_1173952003607aa0e7ad7ed5_87525825 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1669260868607aa0e7ad8279_17715653', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1326390658607aa0e7ad8751_03571892', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_1334388525607aa0e7ad91c3_84337094 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_1155223954607aa0e7ad8e88_76724519 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1334388525607aa0e7ad91c3_84337094', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_826093621607aa0e7ad5898_19126298 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_826093621607aa0e7ad5898_19126298',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_1035096062607aa0e7ad5c47_35246148',
  ),
  'page_title' => 
  array (
    0 => 'Block_1854985403607aa0e7ad60b6_08869350',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_1173952003607aa0e7ad7ed5_87525825',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_1669260868607aa0e7ad8279_17715653',
  ),
  'page_content' => 
  array (
    0 => 'Block_1326390658607aa0e7ad8751_03571892',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_1155223954607aa0e7ad8e88_76724519',
  ),
  'page_footer' => 
  array (
    0 => 'Block_1334388525607aa0e7ad91c3_84337094',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1035096062607aa0e7ad5c47_35246148', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1173952003607aa0e7ad7ed5_87525825', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1155223954607aa0e7ad8e88_76724519', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
