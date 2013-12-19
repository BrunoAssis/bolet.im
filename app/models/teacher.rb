class Teacher < ActiveRecord::Base
	acts_as_tenant :school

	belongs_to :school
	belongs_to :user
end
