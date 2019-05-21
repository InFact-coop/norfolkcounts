# Norfolk Counts

Custom WP theme, built with SASS, Uglify, Coffeescript, etc via webpack.

## Requirements:

- (yarn)[https://yarnpkg.com/en/]
- (docker-compose)[https://www.docker.com/]

## Dev setup

- Set up the compile pipeline

```
cd wp-content/themes/norfolk/
yarn install
```

- Spin up local dev

```
docker-compose up
```

View the site and complete WP install process at localhost:8005

## Development

- Spin up local dev

```
docker-compose up
```

- Start gulp compilation watch mode

```
cd wp-content/themes/norfolk/
yarn run dev
```

The Wordpress local environment will be visible at localhost:8005

## Deployment

- Run the build pipeline in production mode to minify JS

```
yarn run prod
```
