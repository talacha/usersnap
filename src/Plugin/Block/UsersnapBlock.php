<?php

namespace Drupal\usersnap\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Provides a 'UserSnap Widget' block.
 *
 * @Block(
 *   id = "usersnap_block",
 *   admin_label = @Translation("Usersnap Widget"),
 *   category = @Translation("Development")
 * )
 */
class UsersnapBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected ConfigFactoryInterface $configFactory;

  /**
   * Constructs a new UserSnapWidgetBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $config_factory) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $build = [];
    $config = $this->configFactory->get('usersnap.settings');
    $usersnap_api_key = $config->get('api_key');

    if (!empty($usersnap_api_key)) {
      // Add Usersnap widget script.
      $build['#attached']['html_head'][] = [
        [
          '#type' => 'html_tag',
          '#tag' => 'script',
          '#value' => '
            window.onUsersnapLoad = function(api) {
              api.init();
            }
            var script = document.createElement("script");
            script.defer = 1;
            script.src = "https://widget.usersnap.com/global/load/' . $usersnap_api_key . '?onload=onUsersnapLoad";
            document . getElementsByTagName("head")[0] . appendChild(script);
          ',
        ],
        'usersnap_widget',
      ];
    }

    return $build;
  }
}
