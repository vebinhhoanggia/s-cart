## Checkout git repo
 - https://github.com/vebinhhoanggia/S-Cart-core

## Edit file `composer.json`
````json
  "repositories": [
      {
          "type": "path",
          "url": "./packages/S-Cart-core", // <path to local repo>
          "options": {
              "symlink": false
          }
      }
  ],
  "require": {
      "s-cart/core": "*"
  },
````
