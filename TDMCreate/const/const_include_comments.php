<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * tdmcreate module
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         tdmcreate
 * @since           2.5.0
 * @author          Txmod Xoops http://www.txmodxoops.org
 * @version         $Id: const_include_comments.php 11084 2013-02-23 15:44:20Z timgno $
 */
include_once XOOPS_ROOT_PATH.'/modules/TDMCreate/include/functions_const.php';
function const_include_comments($modules, $table_name, $table_fieldname, $table_fields, $table_parameters)
{
	$mod_name = $modules->getVar('mod_name');
	$file = 'comment_edit.php';	
	$tdmcreate_path = TDM_CREATE_MURL.'/'.$mod_name.'/'.$file;
	$root_path = XOOPS_URL.'/modules/'.$mod_name.'/'.$file;
	$text = '<?php'.const_header($modules, $file);
$text .= <<<EOT
\ninclude_once '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/include/comment_edit.php';
EOT;
	
	createFile(	$tdmcreate_path, $text,
				_AM_TDMCREATE_CONST_OK_COMMENTS,
				_AM_TDMCREATE_CONST_NOTOK_COMMENTS, $file);
	if( $modules->getVar('mod_install') == 1 ) {
		createFile(	$root_path, $text,
					_AM_TDMCREATE_CONST_OK_COMMENTS,
					_AM_TDMCREATE_CONST_NOTOK_COMMENTS, $file);
	}
// --------------------------------------------------------------------	
	
	$file = 'comment_delete.php';
	$tdmcreate_path = TDM_CREATE_MURL.'/'.$mod_name.'/'.$file;
	$root_path = XOOPS_URL.'/modules/'.$mod_name.'/'.$file;
	$text = '<?php'.const_header($modules, $file);
$text .= <<<EOT
\ninclude_once '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/include/comment_delete.php';
EOT;
	
	createFile(	$tdmcreate_path, $text,
				_AM_TDMCREATE_CONST_OK_COMMENTS,
				_AM_TDMCREATE_CONST_NOTOK_COMMENTS, $file);
	if( $modules->getVar('mod_install') == 1 ) {
		createFile(	$root_path, $text,
					_AM_TDMCREATE_CONST_OK_COMMENTS,
					_AM_TDMCREATE_CONST_NOTOK_COMMENTS, $file);
	}
// --------------------------------------------------------------------			  
	
	$file = 'comment_post.php';
	$tdmcreate_path = TDM_CREATE_MURL.'/'.$mod_name.'/'.$file;
	$root_path = XOOPS_URL.'/modules/'.$mod_name.'/'.$file;
	$text = '<?php'.const_header($modules, $file);
$text .= <<<EOT
\ninclude_once '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/include/comment_post.php';
EOT;
	
	createFile(	$tdmcreate_path, $text,
				_AM_TDMCREATE_CONST_OK_COMMENTS,
				_AM_TDMCREATE_CONST_NOTOK_COMMENTS, $file);
	if( $modules->getVar('mod_install') == 1 ) {
		createFile(	$root_path, $text,
					_AM_TDMCREATE_CONST_OK_COMMENTS,
					_AM_TDMCREATE_CONST_NOTOK_COMMENTS, $file);
	}
// --------------------------------------------------------------------	
	
	$file = 'comment_eply.php';
	$tdmcreate_path = TDM_CREATE_MURL.'/'.$mod_name.'/'.$file;
	$root_path = XOOPS_URL.'/modules/'.$mod_name.'/'.$file;
	$text = '<?php'.const_header($modules, $file);
$text .= <<<EOT
\ninclude_once '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/include/comment_eply.php';
EOT;
	
	createFile(	$tdmcreate_path, $text,
				_AM_TDMCREATE_CONST_OK_COMMENTS,
				_AM_TDMCREATE_CONST_NOTOK_COMMENTS, $file);
	if( $modules->getVar('mod_install') == 1 ) {
		createFile(	$root_path, $text,
					_AM_TDMCREATE_CONST_OK_COMMENTS,
					_AM_TDMCREATE_CONST_NOTOK_COMMENTS, $file);
	}

	//fields
	$fields_total = explode('|', $table_fields);
	$nb_fields = count($fields_total);
	//print_r($fields_total);
	//parameters
	$parameters_total = explode('|', $table_parameters);

	//Recuperation des parameters affichage dans le formulaire
	for($j=0; $j<$nb_fields; $j++)
	{
		$fields = explode(':', $fields_total[$j]);
		//Afficher dans les elements du formulaire et choisir le type
			if( $j != 0 ) 
			{
				$parameters1 = explode(':', $parameters_total[$j-1]);
				if ( $parameters1[4] == 1 )
				{
					$fpmf = $fields[0];
				}
			}
	}	
	
	$file = 'comment_new.php';
	$tdmcreate_path = TDM_CREATE_MURL.'/'.$mod_name.'/'.$file;
	$root_path = XOOPS_URL.'/modules/'.$mod_name.'/'.$file;
	$text = '<?php'.const_header($modules, $file);
$text .= <<<EOT
include '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/modules/{$mod_name}/class/{$table_name}.php';
\$com_itemid = isset(\$_REQUEST['com_itemid']) ? intval(\$_REQUEST['com_itemid']) : 0;
if (\$com_itemid > 0) {
	\${$table_name}Handler =& xoops_getModuleHandler('{$table_name}', '{$mod_name}');
	\${$table_name} = \${$table_name}handler->get(\$com_itemid);
	\$com_replytitle = \${$table_name}->getVar('{$fpmf}');
	include XOOPS_ROOT_PATH.'/include/comment_new.php';
}
EOT;
	createFile(	$tdmcreate_path, $text,
				_AM_TDMCREATE_CONST_OK_COMMENTS,
				_AM_TDMCREATE_CONST_NOTOK_COMMENTS, $file);
	if( $modules->getVar('mod_install') == 1 ) {
		createFile(	$root_path, $text,
					_AM_TDMCREATE_CONST_OK_COMMENTS,
					_AM_TDMCREATE_CONST_NOTOK_COMMENTS, $file);
	}  
}