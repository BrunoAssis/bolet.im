class Subject < ActiveRecord::Base
	acts_as_tenant :school

	belongs_to :school
end