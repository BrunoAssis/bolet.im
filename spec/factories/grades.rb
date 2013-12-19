# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :grade do
    school nil
    student nil
    teacher_class nil
    grade "9.99"
  end
end
