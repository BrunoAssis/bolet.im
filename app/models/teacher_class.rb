class TeacherClass < ActiveRecord::Base
	acts_as_tenant :school

	belongs_to :school
	belongs_to :teacher
	belongs_to :subject
	belongs_to :classroom
end
