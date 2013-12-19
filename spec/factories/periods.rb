# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :period do
    school nil
    year nil
    order 1
    name "MyString"
    short_description "MyString"
  end
end
