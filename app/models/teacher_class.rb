class TeacherClass < ActiveRecord::Base
  belongs_to :school
  belongs_to :teacher
  belongs_to :subject
  belongs_to :classroom
end
