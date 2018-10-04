<?php
/**
* @file article-book-chapter book information, for administer
*/
namespace Drupal\reposi\Form\Info;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormState;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Query;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\reposi\Controller\Reposi_info_publication;
use Drupal\Component\Utility\UrlHelper;
use Drupal\reposi\Form\Url;
/**
 * Implements an example form.
 */
class reposi_info_artboochap extends FormBase {

  public function getFormId() {
    return 'info_artboochap';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
      $arg=\Drupal::routeMatch()->getParameter('node');

      $serch_p = db_select('reposi_publication', 'p');
      $serch_p->fields('p')
        ->condition('p.p_abid', $arg, '=');
      $serch_publi = $serch_p->execute()->fetchField();
      $info_publi = $serch_p->execute()->fetchAssoc();
      $idpub = $info_publi['p_type'];
      if ($idpub=='Article') {
        $hola=Reposi_info_publication::reposi_info_article_free();
      }elseif ($idpub=='Book') {
        $hola=Reposi_info_publication::reposi_info_book_free();
      }elseif ($idpub=='Book Chapter') {
        $hola=Reposi_info_publication::reposi_info_chap_book_free();
      }
      $form['body'] = array($hola);
      $form['export'] = array(
        '#markup' => '',
      );

      $form['edit'] = array(
        '#type' => 'submit',
        '#submit' => array([$this, 'editForm']),
        '#value' => t('Edit'),
      );
      $form['validate'] = array(
        '#type' => 'submit',
        '#value' => t('Validate/Unvalidated'),
        '#submit' => array([$this, 'Validate_Unvalidated']),
      );
      $form['delete'] = array(
        '#type' => 'submit',
        '#value' => t('Delete'),
        '#submit' => array([$this, 'Delete']),
      );

      return $form;
}
public function editForm(array &$form, FormStateInterface $form_state) {
      $arg=\Drupal::routeMatch()->getParameter('node');
      $serch_p = db_select('reposi_publication', 'p');
      $serch_p->fields('p')
        ->condition('p.p_abid', $arg, '=');
      $serch_publi = $serch_p->execute()->fetchField();
      $info_publi = $serch_p->execute()->fetchAssoc();
      $idpub = $info_publi['p_type'];
      if ($idpub=='Article') {
    	  $form_state->setRedirect('reposi.edit_article', ['node' => $arg]);
      }elseif ($idpub=='Book') {
    	  $form_state->setRedirect('reposi.edit_book', ['node' => $arg]);
      }elseif ($idpub=='Book Chapter') {
    	  $form_state->setRedirect('reposi.edit_chap_book', ['node' => $arg]);
      }
}

function Validate_Unvalidated($form, &$form_state){
    $search_publi = db_select('reposi_publication','p');
    $arg=\Drupal::routeMatch()->getParameter('node');
    $search_publi->fields('p',array('p_check'))
                 ->condition('p_abid',$arg, '=');
    $check_pub = $search_publi->execute()->fetchField();
    if ($check_pub == 1) {
      db_update('reposi_publication')->fields(array(
        'p_check'  => '0',
      ))->condition('p_abid', $arg)
      ->execute();
    } else {
      db_update('reposi_publication')->fields(array(
        'p_check'  => '1',
      ))->condition('p_abid', $arg)
      ->execute();
    }
    drupal_set_message('The verification was change.');
}

public function validateForm(array &$form, FormStateInterface $form_state){

}

public function Delete(array &$form, FormStateInterface $form_state) {
    $arg=\Drupal::routeMatch()->getParameter('node');
    $search_pat = db_select('reposi_publication','p');
    $search_pat->fields('p')
            ->condition('p.p_abid', $arg, '=');
    $info_publica = $search_pat->execute()->fetchAssoc();
    $arg_pid=$info_publica['pid'];
    $form_state->setRedirect('reposi.Reposi_del_publi', ['node' => $arg_pid]);
}

/**
 * {@inheritdoc}
 */
public function submitForm(array &$form, FormStateInterface $form_state) {

}
}
