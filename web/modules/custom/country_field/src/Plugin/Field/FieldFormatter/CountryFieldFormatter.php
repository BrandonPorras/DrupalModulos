<?php

namespace Drupal\country_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase; 
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Component\Utility\Html;


/**
 * Implementacion del 'country_field_formatter_type'
 *
 * @FieldFormatter(
 *   id = "country_field_formatter_type",
 *   label = @Translation("Country Field - Formatter"),
 *   description = @Translation("Country Field - Formatter"),
 *   field_types = {
 *     "country_field_type",
 *   }
 * )
 */


class CountryFieldFormatter extends FormatterBase{

   
	/**
	 * {@inheritdoc}
	 */
    public function viewElements(FieldItemListInterface $items, $langcode)
	{
		$elements = [];

		foreach ($items as $delta => $item) {
			$elements[$delta] = [
				'value' => [
					'#markup' => $this->viewValue($item)
				]
			];
		}

		return $elements;
	}

     /**
	 * generate the ouput
	 *
	 * @param FieldItemInterface $item
	 * @return string
	 */
	private function viewValue(FieldItemInterface $item)
	{
		return nl2br(Html::escape($item->value));
	}
}


