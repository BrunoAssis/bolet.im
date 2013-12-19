class Grade < ActiveRecord::Base
  belongs_to :school
  belongs_to :student
  belongs_to :teacher_class
end
