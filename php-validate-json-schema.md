# PHP - Walidacja schematu JSON

**JSON Schema** - describe your JSON data format.

## Czym jest JSON Schema

- opisuje dane w formacie JSON
- przejrzysty i czytelny format
- opis umożliwia sprawdzanie czy struktura danego JSONa spełnia kryteria
- oficjalna strona: [json-schema.org](http://json-schema.org/) oraz [github.com/json-schema/json-schema](https://github.com/json-schema/json-schema)

### Przykład JSON Schema

```json
{
  "$schema": "http://json-schema.org/draft-04/schema#",
  "title": "Packet",
  "description": "Incoming packet of messages",
  "type": "object",
  "properties": {
    "metadata": {
      "type": "object",
      "properties": {
        "timestamp": {
          "type": "number"
        },
        "source": {
          "type": "string"
        },
        "authinfo": {
          "type": "object",
          "properties": {
            "agent": {"type": "string"},
            "auth": {"type": "string"}
          },
          "required": [
            "agent",
            "auth"
          ]
        }
      },
      "required": [
        "timestamp",
        "source",
        "authinfo"
      ]
    },
    "data": {
      "type": "array"
    }
  },
  "required": [
    "metadata",
    "data"
  ]
}
```

### Przydatne linki:

- [Understanding JSON](http://spacetelescope.github.io/understanding-json-schema/) - *JSON Schema* Guide
- [An Introduction to JSON Schema](http://crypt.codemancers.com/posts/2014-02-11-An-introduction-to-json-schema/)
- [JSON Schema Generator](http://jsonschema.net/#/) - Generator *JSON Schema* na podstawie dostarczonych danych w formacie JSON


## Przykład walidacji (PHP)

Z wykorzystaniem biblioteki [justinrainbow/json-schema](https://github.com/justinrainbow/json-schema).

```php
$retriever = new JsonSchema\Uri\UriRetriever;
$validator = new JsonSchema\Validator;

$jsonToValid = 'toValidate.json';
$schemaFile = 'scheme.json';

$packetData = json_decode($packetJson);
$packetSchema = $retriever->retrieve($schemaFile);

$validator->check($packetData, $packetSchema);

if ($validator->isValid()) {
    echo 'Data is a valid JSON schema';
} else {
    var_dump($validator->getErrors());
}
```