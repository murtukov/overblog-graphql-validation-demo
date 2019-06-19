# overblog-graphql-validation-demo
A Symfony 4.3 demo project to show validation use cases of overblog/graphql-bundle

### Installation
* Clone the repository into any directory:
`git clone https://github.com/murtukov/overblog-graphql-validation-demo.git`
* Install dependencies: `composer install`

### Test validation feature:
* Run local server: `symfony serve --no-tls` or `php bin/console server:run`

From any graphql client make a mutation request to the server `127.0.0.1:8000`:

Example:

```graphql
mutation {
  createUser(
    username: "murtukov"
    password: "test1234"
    passwordRepeat: "test1234"
    birthday: "2000-12-12"
    about: "I love GraphQL!"
    emails: ["murtukov@gmail.com", "marsel@mail.de", "equilibrium.90@mail.ru"]
    address: {
      city: "Berlin"
      street: "Alexanderstraße 45"
      zipCode: 10320
      residents: ["murtukov"]
    }
    extraConfig: "{\"color\":\"green\"}"
    workPeriod: {
      startDate: "2016-03-17",
      endDate: "2016-03-18"
    }
    university: {
      title: "HTW Berlin"
      address: "Grossenhainer Str. 64"
      phone: "+491785322995"
      country: "DE"
    }
  )
}
```

Try to chage the data as you like to force validation errors.

Validation rules are located in `config/graphql/types/Mutation.yaml` and in `src/Entity/University.php` as annotations.

Don't forget to ```php bin/console cache:clear``` after making changes in the validation rules and `php bin/console graphql:compile` if you turn the `auto_compile` option off.
