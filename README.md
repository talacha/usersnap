# # Drupal 10 Usersnap Integration Module

## Description

The Drupal 10 Usersnap Integration Module enables seamless integration of Usersnap feedback collection widget into your Drupal website. Usersnap is a powerful tool for collecting feedback and bug reports from users directly on your website. With this module, you can easily configure Usersnap API key and place the Usersnap widget on any visible region of your website.

## Features

- Configurable Usersnap API key through the Drupal admin interface.
- Custom block to embed the Usersnap feedback collection widget on any visible region of the website.

## Installation

1. Download the Usersnap Integration Module from [Drupal.org](https://www.drupal.org/project/usersnap).
2. Extract the downloaded module into your Drupal contributed modules directory (`/modules/contrib`).
3. Enable the module through the Drupal admin interface by navigating to `Extend` and checking the box next to "Usersnap Integration".

## Configuration

1. After enabling the Usersnap Integration Module, navigate to `Configuration` > `Web services` > `Usersnap settings` (`/admin/config/services/usersnap`).
2. Enter your Usersnap API key in the provided field.
3. Save the configuration.

## Usage

### Adding Usersnap Widget to a Page

1. Navigate to `Structure` > `Block layout` (`/admin/structure/block`).
2. Click on "Place block" in the region where you want to add the Usersnap widget.
3. Search for the "Usersnap Feedback" block and click "Place block".
4. Configure the block settings if necessary.
5. Click "Save block".

Now, the Usersnap widget will be displayed on the specified region of your website, allowing users to provide feedback and bug reports seamlessly.

## Support

For any issues or questions regarding this module, please visit the [Drupal Usersnap Integration Module issue queue](https://www.drupal.org/project/issues/usersnap) on GitHub.

## Credits

This module was developed by [Talacha.dev](https://talacha.dev).

## License

This module is licensed under the GNU General Public License, version 2 or later. See the LICENSE.txt file for details.
