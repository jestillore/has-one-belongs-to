# Has-One-Belongs-To
> A one-to-one relationship with pivot for Laravel Eloquent.

This is just the same as `belongsToMany` from Eloquent. The only difference is that the model will only be related to a single model instead of a collection of models.


## Installation

```sh
composer require jestillore/has-one-belongs-to
```

## Usage example

##### Database tables

`courses` table

| id | name |
|----|------|
| 1  | Math |

`users` table

| id | name           |
|----|----------------|
| 1  | Juan dela Cruz |

`student_data` table

| id | user_id | course_id | student_number |
|----|---------|-----------|----------------|
| 1  | 1       | 1         | 1234567890     |

##### Code Usage

```php
class Course
{
    
}

class User
{
    use HasOneBelongsToRelationship;
    
    public function course()
    {
        return $this->hasOneBelongsTo(Course::class, 'student_data');
    }
}
```

## Versioning

I decided to drop the whole syncing with illuminate version thing to avoid upgrading every time laravel upgrades to a new version.

## Author

Jillberth Estillore – [@ejillberth](https://twitter.com/ejillberth) – ejillberth@gmail.com

Distributed under the MIT license. See ``LICENSE`` for more information.

[https://github.com/jestillore/has-one-belongs-to](https://github.com/jestillore/has-one-belongs-to)
