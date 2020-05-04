<?php

namespace Drupal\country_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * @FieldType(
 *   id = "country_field_type",
 *   label = @Translation("Country field type"),
 *   description = @Translation("Country field type"),
 *   default_widget = "country_field_widget_type",
 *   default_formatter = "country_field_formatter_type"
 * )
 */

class CountryFieldType extends FieldItemBase
{

    /**
     * {@inheritdoc}
     */
    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties['value'] = DataDefinition::create('string')
            ->setLabel(new TranslatableMarkup('Country'));

        return $properties;
    }

    /**
     * {@inheritdoc}
     */
    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {

        // Country field va a almacenar el codigo de pais, por ej: CR, US, FR

        $columns = [
            "columns" => [
                'value' => [
                    'type' => 'varchar',
                    'length' => '3',
                    'description' => t('Country Field'),
                    'not null' => FALSE
                ]
            ]
        ];

        return $columns;
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        $value = $this->get('value')->getValue();
        return $value === NULL || $value === '';
    }
}